const StartTestButtons = document.querySelector('.StartTestButton');
const DetectDevices = document.querySelector('.DetectDevice');
const ScreenTests = document.querySelector('.ScreenTest');
const FormErrorScreenTests = document.querySelector('.FormErrorScreenTest');
const TouchPadTests = document.querySelector('.TouchPadTest');
const TouchScreenTests = document.querySelector('.TouchScreenTest');
const KeyboardTests = document.querySelector('.KeyboardTest');
const SpeakersTests = document.querySelector('.SpeakersTest');
const USBPORTSTESTs = document.querySelector('.USBPORTSTEST');
const HDMIPORTTESTs = document.querySelector('.HDMIPORTTEST');
const BatteryTests = document.querySelector('.BatteryTest');
const ChargeTests = document.querySelector('.ChargeTest');
const SaveInfo = document.querySelector('.SaveInfo');

SaveInfo.addEventListener('click', StartTestScreen);