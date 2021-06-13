1. index
    - 整頁直接複製，**修改成該頁路徑**
    - **修改三元運算最後一部份**
        * 找balde原本顯示的欄位
        * value**改成此頁欄位名稱**
2. create
    - (有上層的話)取得上層關連，打去adminController，給select option用
    - 看blade中該有什麼欄位
    - state要有相對應的值
    - render中調整const this.state 的解構值
    - 調整createNewData 中需要的值
    - 調整傳給store的路徑
3. update
    - 同create
    - 
4. delete
    - 修改delete 的路徑
5. controller
    - 同名controller
        * return 同名model::with('關連表')->get();
            * store
            * update
            * destroy
            * indexDataTable
    - AdminController
        * 取上層資料

