/**
 * Ajax Class
 *
 * ES6
 *
 * Paula George
 */

class Ajax {
    static request(){
        $(document).ready(function () {
            $.ajax({
                type : 'POST' ,
                data : {getReq : 1} ,
                success : function(){
                    $.ajax({
                        url : '../msgs.json',
                        success : function(response){
                            Ajax.execute(response);
                            setTimeout(function(){
                                Ajax.request();
                            },1000);
                        }
                    }); 
                    
                }
            });
        });
    }
    static sendRequest(){
        
        let text_area = document.getElementById('text_area') ;
        $(document).ready(function () {
            if(text_area.value !== "") {
                jQuery.ajax({
                    type: 'POST',
                    data: {sendReq: 1, message: text_area.value},
                    success: function () {
                        text_area.value = "";
                    }
                });
            }

        });
    }
    static createContainer(respond){
        let element = document.createElement('div');
        element.className = 'main m-3 border p-1 text-center mx-auto' ;
        document.getElementsByClassName('container')[0].appendChild(element);
        let array = [['h4' ,'name p-3  font-weight-bold  bg-dark text-white' ,respond[0].user_name ],
            ['p' , 'message p-1 text-left bg-primary text-white' ,respond[0].message],
            ['p' , 'time text-dark text-right' ,respond[0].time_sent]];
        for(let i = 0; i < 3;i++) {
            let j = 0;
            while(j < 3){
                let minor = document.createElement(array[i][j]);
                j++;
                minor.className = array[i][j];
                j++;
                minor.innerHTML = array[i][j];
                j++;
                element.appendChild(minor);
            }

        }


    }
    static scroll(){
        let height = document.getElementsByClassName('container')[0].scrollHeight;
        document.getElementsByClassName('container')[0].scrollTo(0,height);
    }
    static execute(respond){
        Ajax.createContainer(respond);
        Ajax.scroll();
    }

}
//exection part 
$(document).ready(function(){
    Ajax.scroll();
    Ajax.request();
});
document.getElementsByName("btn_send")[0].onclick = function(){
    Ajax.sendRequest();
};