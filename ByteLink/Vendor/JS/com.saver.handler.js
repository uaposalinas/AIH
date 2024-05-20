
function WriteToSendForm() {

    const GetScreenTest = localStorage.getItem('ScreenTest') || 'none';
const GetTouchPadTest = localStorage.getItem('TouchPadTest') || 'none';
const GetTouchScreenTest = localStorage.getItem('TouchScreenTest') || 'none';
const GetSpeakerTest = localStorage.getItem('SpeakerTest') || 'none';
const GetRightSpeakerTest = localStorage.getItem('RightSpeakerTest') || 'none';
const GetLeftSpeakerTest = localStorage.getItem('LeftSpeakerTest') || 'none';
const GetPortTested = localStorage.getItem('PortTested') || 'none';
const GetHDMIPORTTEST = localStorage.getItem('HDMIPORTTEST') || 'none';
const GetCurrentBatteryTestPorcent = localStorage.getItem('CurrentBatteryTestPorcent') || 'none';
const GetChargerTest = localStorage.getItem('ChargerTest') || 'none';
const GetMicTest = localStorage.getItem('MicTest') || 'none';
const GetCameraTest = localStorage.getItem('CameraTest') || 'none';
const GetKeyboardTest = localStorage.getItem('KeyboardTest') || 'none';


    document.querySelector('.ScreenTestIn').value = GetScreenTest;
    document.querySelector('.TouchPadTestIn').value = GetTouchPadTest;
    document.querySelector('.TouchScreenTestIn').value = GetTouchScreenTest;
    document.querySelector('.LeftSpeakerTest').value = GetSpeakerTest;
    document.querySelector('.RightSpeakerTest').value = GetRightSpeakerTest;
    document.querySelector('.SpeakersTests').value = GetLeftSpeakerTest;
    document.querySelector('.UsbPortsTest').value = GetPortTested;
    document.querySelector('.HdmiPortTest').value = GetHDMIPORTTEST;
    document.querySelector('.BatteryLifePercentage').value = GetCurrentBatteryTestPorcent;
    document.querySelector('.ChargerTest').value = GetChargerTest;
    document.querySelector('.MicrophoneTest').value = GetMicTest;
    document.querySelector('.CameraTestIn').value = GetCameraTest;
    document.querySelector('.KeyboardTestIn').value = GetKeyboardTest;
    document.querySelector('.ControlForm').submit();
}
