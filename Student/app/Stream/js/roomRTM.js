let handleMemberJoined = async (MemberId) =>
{
    console.log('member joinend: ', MemberId);
    addMemberToDom(MemberId);
    let members = await channel.getMembers()
    updateMemberTotal(members)
}


let addMemberToDom = async (MemberId) => 
{
    let {name} = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])
    let memberWrapper = document.getElementById('member__list')
    let memberItem = `<div class="member__wrapper" id="member__${MemberId}__wrapper">
                       <span class="green__icon"></span>
                       <p class="member_name">${name}</p>
                    </div>`
    memberWrapper.insertAdjacentHTML('beforeend',memberItem)
}
let updateMemberTotal = async (members) => 
{
    let total = document.getElementById('member__count')
    total.innerText =members.length;
}
let handleMemberLeft = async (MemberId) =>
{
    removeMemberFromDom(MemberId)
   
    
    let members = await channel.getMembers()
    updateMemberTotal(members)
}

let  removeMemberFromDom = async (MemberId) =>
{
    let memberWrapper = document.getElementById(`member__${MemberId}__wrapper`)
    memberWrapper.remove()
}
let getMembers = async () => 
{
    let members = await channel.getMembers()
    updateMemberTotal(members)
    for (let i=0; members.length > i; i++)
    {
        addMemberToDom(members[i]);
    }
    
}
let hanndleChannelMessage = async (messageData, MemberId) => 
{
    console.log('A new message was recieved')
    let data = JSON.parse(messageData.text)
    if(data.type==='chat')
    {
        addMeessageToDom(data.diplayName,data.message)
    }
}

let sendMessage = async (e) => {
    e.preventDefault()

    let message = e.target.message.value
    channel.sendMessage({text:JSON.stringify({'type':'chat','message':message, 'diplayName':dispalyName})})
    
    addMeessageToDom(dispalyName, message)

    e.target.reset()
}


let addMeessageToDom = (name,message) =>
{
    let messagesWrapper = document.getElementById('messages')
    let newMessage = `<div class="message__wrapper">
    <div class="message__body">
        <strong class="message__author">${name}</strong>
        <p class="message__text">${message}</p>
    </div>
</div>` 

messagesWrapper.insertAdjacentHTML('beforeend',newMessage)

let lastMessage = document.querySelector('#messages .message_wrapper:last-child')
if(lastMessage)
{
    lastMessage.scrollIntoView()
}
}

let leaveChannel = async () => {
    await channel.leave()
    await rtmClient.logout()
}

window.addEventListener('beforeunload', leaveChannel)
let messageForm = document.getElementById('message__form')
messageForm.addEventListener('submit',sendMessage)