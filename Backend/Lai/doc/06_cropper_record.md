1. 要使用的頁面加入
    * ```js
        import Cropper from '../../../js/cropper.js'
        ```
2. 直接把要傳去後端的img value改成下列這樣
    * ```js
        const inputImg = this.cropImg
        ```
3. 要使用的file input class要加上**image**
    * ```js
        <input ref={c => this.infoImg = c} className="form-control image" id="img" name="img" type="file" accept="image/*" />
        ```
4. 要使用的頁面要加入modal
    * ```html
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
                                    <img id="image" />
                                </div>
                                <div className="col-md-4">
                                    <div className="preview" style={{ overflow: 'hidden', height: 100 }}>
                                        <img id="image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" className="btn btn-primary" id="crop">Crop</button>
                    </div>
                </div>
            </div>
        </div>
        ```
5. 在controller加入
    1. 加入檢查用的method
        * ```php
            public function crop($img)
            {
                // 先檢查有沒有base64的格式
                if (!($img && Str::contains($img, ['src="data:image', 'src=\'data:image']))) {
                    return $img;
                }

                // ([^;]+) : 找的是冒號(;)前的所有(+的關係)字元
                // ([^\"]+) : 找的是不等於"的所有(+的關係)字元，找到"為止
                $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';

                $check = preg_match($pattern, $img, $matches);
                if ($check) {
                    return base64_decode($matches[4]);
                }
            }
            ```
    2. store中檢查img是否base64
        * ```php
            if ($request->img) {
                $request->img = $this->crop($request->img);
            }
            ```



