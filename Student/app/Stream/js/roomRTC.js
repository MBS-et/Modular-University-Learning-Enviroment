const appID = "5442f0810cb749dd87cecc59b79821e5";

let uid = sessionStorage.getItem("uid");

if (!uid) {
  uid = String(Math.floor(Math.random() * 10000));
  sessionStorage.setItem("uid", uid);
}

let token = null;
let client;

let rtmClient;
let channel;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
let roomID = urlParams.get("room");

if (!roomID) {
  roomID = "main";
}
let dispalyName = localStorage.getItem('display_name')
if(!dispalyName)
{
  window.location = 'lobby.html'
}
let localTracks = [];
let remoteUsers = {};
let localScreenTrack;
let sharingScreen= false;

let joinRoomInit = async () => {
  rtmClient = await AgoraRTM.createInstance(appID)
  await rtmClient.login({uid,token})
   await rtmClient.addOrUpdateLocalUserAttributes({'name':dispalyName})
  channel = await rtmClient.createChannel(roomID)
  await channel.join()

  getMembers();
  
  

  channel.on('MemberJoined', handleMemberJoined)
  channel.on('MemberLeft', handleMemberLeft)
  channel.on('ChannelMessage', hanndleChannelMessage)
 

  client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
  await client.join(appID, roomID, token, uid);
client.on('user-published',handleUserPublished)
client.on('user-left',handleUserLeft)
  joinStream();
};

let joinStream = async () => {
  localTracks = await AgoraRTC.createMicrophoneAndCameraTracks({},{encoderConfig:{
    width:{min:640,ideal:1080 ,max:1080 },
    height:{min:480,ideal:720 ,max:720 }
  }});
  

  let player = `<div class="video_container" id="user-container-${uid}">
                  <div class="video-player" id="user-${uid}"></div>
                </div>`;

document.getElementById('streams_container').insertAdjacentHTML('beforeend',player)
document.getElementById(`user-container-${uid}`).addEventListener('click',expandVideoFrame)


localTracks[1].play(`user-${uid}`)
await client.publish([localTracks[0],localTracks[1]])
};
 let switchToCamera = async () =>
 {
    let player = `<div class="video_container" id="user-container-${uid}">
    <div class="video-player" id="user-${uid}"></div>
  </div>`;

  displayFrame.insertAdjacentHTML('beforeend',player)

    await localTracks[0].setMuted(true);
    await localTracks[1].setMuted(true);

    document.getElementById('mic-btn').classList.remove('active');
    document.getElementById('screen-btn').classList.remove('active');


    localTracks[1].play(`user-${uid}`)
    await client.publish([localTracks[1]])
 }

let handleUserPublished = async(user, mediaType) => 
{
    remoteUsers[user.uid]=user
    await client.subscribe(user,mediaType)
    let player = document.getElementById(`user-container-${user.uid}`)
    if(player===null)
    {
        player = `<div class="video_container" id="user-container-${user.uid}">
                  <div class="video-player" id="user-${user.uid}"></div>
                </div>`;
            document.getElementById('streams_container').insertAdjacentHTML('beforeend',player)
            document.getElementById(`user-container-${user.uid}`).addEventListener('click',expandVideoFrame)
    }
    
    if(displayFrame.style.display)
    {
        let videoFrame = document.getElementById(`user-container-${user.uid}`)
        videoFrame.style.height='100px'
        videoFrame.style.width='100px'
    }

    if(mediaType==='video')
    {
        user.videoTrack.play(`user-${user.uid}`)
    }
    if(mediaType==='audio')
    {
        user.audioTrack.play()
    }
    
}


let handleUserLeft = async(user) => 
{
 delete remoteUsers[user.uid]
 document.getElementById(`user-container-${user.uid}`).remove();


 if(userIdInDisplayFrame === `user-container-${user.uid}`)
 {
    displayFrame.style.display=null;
    let videoFrames = document.getElementsByClassName('video_container')
    for(let i=0; videoFrames.length > i ; i++)
    {
      
        videoFrames[i].style.height = '300px'
        videoFrames[i].style.width='300px'
      
      
    }
 }
}

let toggleCamera = async (e) => {
    let button = e.currentTarget

    if(localTracks[1].muted){
        await localTracks[1].setMuted(false)
        button.classList.add('active')
    }else
    {
        await localTracks[1].setMuted(true)
        button.classList.remove('active')
    }
}
let toggleAudio = async (e) => {
    let button = e.currentTarget

    if(localTracks[0].muted){
        await localTracks[0].setMuted(false)
        button.classList.add('active')
    }else
    {
        await localTracks[0].setMuted(true)
        button.classList.remove('active')
    }
}

let toggleScreen = async (e) => {
 let screenButton = e.currentTarget;
 let cameraButton = document.getElementById('camera-btn')

 if(!sharingScreen)
 {
    sharingScreen =true;
    screenButton.classList.add('active')
    cameraButton.classList.remove('active')
    cameraButton.style.display='none'
    localScreenTrack = await AgoraRTC.createScreenVideoTrack()

    document.getElementById(`user-container-${uid}`).remove()
    displayFrame.style.display = 'block';

   let player = `<div class="video_container" id="user-container-${uid}">
    <div class="video-player" id="user-${uid}"></div>
  </div>`;

  displayFrame.insertAdjacentHTML('beforeend',player)
  document.getElementById(`user-container-${uid}`).addEventListener('click',expandVideoFrame)
  
  userIdInDisplayFrame = `user-container-${uid}`
  localScreenTrack.play(`user-${uid}`)

  await client.unpublish([localTracks[1]])
  await client.publish([localScreenTrack])
let videoFrames = document.getElementsByClassName('video_container')
  for(let i=0; videoFrames.length > i ; i++)
{
  if(videoFrames[i].id!=userIdInDisplayFrame)
  {
    videoFrames[i].style.height = '100px'
  videoFrames[i].style.width='100px'
  }
  
}
}
 else
 {
    sharingScreen=false;
    screenButton.classList.remove('active')
    cameraButton.style.display='block'
    document.getElementById(`user-container-${uid}`).remove()
   // await client.unpublish([localTracks[1]])
    await client.unpublish([localScreenTrack])

    switchToCamera()
 }
}
document.getElementById('mic-btn').addEventListener('click',toggleAudio)
document.getElementById('camera-btn').addEventListener('click',toggleCamera)
document.getElementById('screen-btn').addEventListener('click',toggleScreen)
joinRoomInit();
