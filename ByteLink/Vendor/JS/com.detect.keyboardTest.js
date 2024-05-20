function GoToKeyBoardTest(){

    if(localStorage.getItem('GetKeyBoardTestStatus')){

        if(localStorage.getItem('GetKeyBoardTestStatus') == "true"){

            StartKeyboardScreen()

        }else if(localStorage.getItem('GetKeyBoardTestStatus' == 'PASSED')){

            document.querySelector('.KeyboardTest').style.display = "none";
            document.querySelector('.SpeakerTest').stye.display = "none";
            window.removeEventListener('keydown');

        }

    }else{

        localStorage.setItem('GetKeyboardTestStatus', "true");
        StartKeyboardScreen();

    }

}