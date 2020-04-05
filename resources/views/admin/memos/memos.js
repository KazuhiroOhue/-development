//送信前の確認機能を追加
        function check(){
            if (window.confirm('この内容でよろしいですか？')) {
                //window.alert('追加されました');
		        return true;
	        } else {
		        return false;
	        }
        }
    //残り文字数を表示   
        $(function () {
            $("textarea").keyup(function(){
                var txtcount = $(this).val().length;
                $("#txtlmt").text(txtcount);
                if(txtcount == 0){
                    $("#txtlmt").text("0");
                } 
                if(txtcount >= 200){
                    $("#txtlmt").css("color","#d577ab");
                } else {
                    $("#txtlmt").css("color","#333");
                }
            });
        });