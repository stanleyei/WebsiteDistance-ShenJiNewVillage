import Axios from 'axios'
import React, { Component } from 'react'
import Cropper from '../../../js/cropper.js'

export default class Create extends Component {
    constructor(props) {
        super(props);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            imgBase64: ''
        };

        // 新增頁面有上層關連的需要取得上層所有選項
        // 在controller新增取得此筆資料的method
        // 寫一固定路徑，依照傳過去的upperName回傳對應的上層資料
        axios.post("/admin/upper_data", {
            // 在此輸入需要的上層名稱
            upperName: 'info_types'
        }).then(
            response => {
                // 將回傳的上層關連存入state
                this.setState({ upperRelation: response.data })
            }
        )
    }

    createNewData = (event) => {
        // 避免button預設事件
        event.preventDefault()
        // 取得關閉新增頁、更新table的方法
        const { createPageDown, updateTable } = this.props
        // 取得input value
        const {
            infoTypeId: { value: inputTypeinfoTypeId },
            infoName: { value: inputName },
            // infoContent: { value: inputContent },
            infoDateStart: { value: inputDateStart },
            infoDateEnd: { value: inputDateEnd },
            infoLocation: { value: inputLocation },
            infoOrganizer: { value: inputOrganizer },
            infoCalendar: { value: inputCalendar },
        } = this

        const inputContent = $('.textarea').summernote('code');

        // 取得圖片檔案
        // const inputImg = this.infoImg.files[0]
        const inputImg = this.cropImg
        // console.log(this.cropImg);
        let formData = new FormData()
        formData.append('type_id', inputTypeinfoTypeId)
        formData.append('name', inputName)
        formData.append('content', inputContent)
        formData.append('img', inputImg)
        formData.append('date_start', inputDateStart)
        formData.append('date_end', inputDateEnd)
        formData.append('location', inputLocation)
        formData.append('organizer', inputOrganizer)
        formData.append('calendar', inputCalendar)

        // 判斷是否都存在，目前是全部都必填，新增按鈕才有效
        // const checkExist = inputTypeinfoTypeId && inputName && inputContent && inputImg && inputDateStart && inputDateEnd && inputLocation && inputOrganizer && inputCalendar
        // request 後端新增資料
        // if (checkExist) {
        // 不同頁面要不同路徑
        Axios.post('admin/info', formData).then(response => {
            // 回傳的資料是新資料，直接丟回上層state
            updateTable(response.data)
            // 關閉新增頁
            createPageDown()
        })
        // }
    }

    componentDidUpdate() {

        // summernote
        $('.textarea').summernote({
            width: '100%',
            height: 200,
        });

        // cropper
        var bs_modal = $('#modal');
        var image = document.getElementById('image');
        var cropper, reader, file;

        $("body").on("change", ".image", (e) => {
            var files = e.target.files;
            var done = (url) => {
                image.src = url;
                bs_modal.modal('show');
            };


            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = (e) => {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        bs_modal.on('shown.bs.modal', () => {
            cropper = new Cropper(image, {
                aspectRatio: 400 / 300,
                viewMode: 3,
                // minCropBoxWidth: 1000,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', () => {
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        });

        $("#set-aspectRatio-16-9").on('click', () => {
            cropper.setAspectRatio(16 / 9)
        })

        $("#set-aspectRatio-4-3").on('click', () => {
            cropper.setAspectRatio(4 / 3)
        })

        $("#crop").click(() => {
            var canvas = cropper.getCroppedCanvas({
                width: 1600,
                height: 1200,
            });

            if (canvas !== null) {
                canvas.toBlob((blob) => {
                    var url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = () => {
                        // var base64data = reader.result;

                        // 把blob轉換成給後端讀的file
                        const cropImg = new File([blob], "img");
                        // 存進實體下的cropImg，在取值時較方便
                        this.cropImg = cropImg;
                        this.imgBase64 = reader.result;
                        this.setState({})

                        bs_modal.modal('hide');

                        // $.ajax({
                        //     type: "POST",
                        //     dataType: "json",
                        //     url: "upload.php",
                        //     data: { image: base64data },
                        //     success: function (data) {
                        //         bs_modal.modal('hide');
                        //         alert("success upload image");
                        //     }
                        // });
                    };
                });
            }
        });

    }

    render() {
        const { createPageDown } = this.props
        const { upperRelation } = this.state
        return (
            <div className="container">
                <h1 className="display-3 text-center">新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="type_id">類型</label>
                        <select ref={c => this.infoTypeId = c} className="form-control" name="type_id" id="type_id">
                            {
                                upperRelation.map((data) => {
                                    return (
                                        <option key={data.id} value={data.id}>{data.name}</option>
                                    )
                                })
                            }
                        </select>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input ref={c => this.infoName = c} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="content">內容</label>
                        <textarea ref={c => this.infoContent = c} className="form-control textarea" id="content" name="content" cols="30" rows="10"></textarea>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="img">圖片</label>
                        <input ref={c => this.infoImg = c} className="form-control image" id="img" name="img" type="file" accept="image/*" />

                        <div>
                            {
                                this.imgBase64 &&
                                <img className="pre-img-div" src={this.imgBase64} alt="" />
                            }
                        </div>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="date_start">開始日期</label>
                        <input ref={c => this.infoDateStart = c} className="form-control" id="date_start" name="date_start" type="date" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="date_end">結束日期</label>
                        <input ref={c => this.infoDateEnd = c} className="form-control" id="date_end" name="date_end" type="date" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="location">地點</label>
                        <input ref={c => this.infoLocation = c} className="form-control" id="location" name="location" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="organizer">主辦單位</label>
                        <input ref={c => this.infoOrganizer = c} className="form-control" id="organizer" name="organizer" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="calendar">日曆</label>
                        <input ref={c => this.infoCalendar = c} className="form-control" id="calendar" name="calendar" type="text" />
                    </div>
                    <button className="btn btn-secondary" onClick={createPageDown}>取消</button>
                    <button onClick={this.createNewData} className="btn btn-primary">新增</button>
                </form>

                <div className="modal fade" id="modal" tabIndex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div className="modal-dialog modal-lg" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title" id="modalLabel">Crop image</h5>
                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div className="modal-body">
                                <div className="img-container">
                                    <div className="row">
                                        <div className="col-md-8">
                                            <img style={{width:'100%'}} id="image" />
                                        </div>
                                        <div className="col-md-4">
                                            <div className="preview" style={{ overflow: 'hidden', height: 100 }}>
                                                <img id="image" />
                                            </div>
                                        </div>
                                        <div>
                                            <button id="set-aspectRatio-4-3" className="btn btn-success">4 : 3</button>&nbsp;
                                            <button id="set-aspectRatio-16-9" className="btn btn-success">16 : 9</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" className="btn-primary" id="crop">Crop</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        )
    }
}
