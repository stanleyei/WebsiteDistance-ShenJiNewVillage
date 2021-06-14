0. 要使用的頁面要加上
    * <link rel="stylesheet" href="{{ asset('css/summernote.min.css') }}">
    * <script src="{{ asset('js/summernote.min.js') }}"></script>
1. 
    ```js
    <!-- 當送出值時要另外取，因為react的onChange抓不到summernote的input value -->
    const {
        type_id,
        name,
        img,
        date_start,
        date_end,
        location,
        organizer,
        calendar,
    } = this.state
    const content = $('.textarea').summernote('code');

    componentDidUpdate() {
        $('.textarea').summernote({
            width: '100%',
            height: 200,
        });
    }
    ```
2. 綁在ID=content的textarea有問題，後改成綁在.textarea
3. index的content欄位要改成下列的形式才能顯示raw html
    * <td dangerouslySetInnerHTML={{__html: data.content}}></td>
4. 遇到update時該怎麼刪除圖片檔案的問題
    * store
        - 資料進來時content做regex，檢查是否有base64
            * 是
                1. 轉換base64 to file
                2. 儲存檔案到本地端，取得image path
                3. 將content中base64的文字替換成image path
                4. 將content存入資料庫
            * 否 資料直接存入content欄位
    * update
        - 舊資料做一次regex，取得image path
        - 新資料做一次regex，檢查base64，有兩種可能
            1. 沒有base64類型的圖
                * 無新圖
                * 檢查舊資料的image path是否存在
                    * 是 圖片檔案不改動
                    * 否 刪除圖片檔案
            2. 有base64類型的圖
                1. 轉換base64 to file，存成檔案
                2. 路徑轉換後取得新資料所有image path
                3. 跟舊資料image path對照
                4. 在新資料中不存在的image path圖片檔案刪除
        - 檢查中沒有對應的圖片時刪除舊資料圖片
    * destroy
        - 刪除時content做regex，取得image path，全刪掉



5. 目前先在**資訊列表**、**店家列表**的內容部分新增summernote
    * index加上第3項
    * create加上第1、2項
    * controller加上store跟destroy用的method
        - 最前面引入
            ```php
            use Illuminate\Support\Str;
            ```
        - store中加入
            ```php
            if ($data['content']) {
                $data['content'] = $this->content_base64_check($data['content']);
                }
            ```
        - destroy中加入
            ```php
            $dbData->content = $this->summernote_destroy_image($dbData->content);
            ```






