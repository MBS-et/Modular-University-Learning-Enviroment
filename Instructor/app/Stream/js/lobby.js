let form = document.getElementById('lobby__form')
let dispalyName = localStorage.getItem('display_name')

if(dispalyName)
{
    form.name.value = dispalyName
}


form.addEventListener('submit', (e) => {
    e.preventDefault()

    localStorage.setItem('display_name',e.target.name.value)
    let inviteCode = e.target.room.value

    if(!inviteCode)
    {
        inviteCode = string(Math.floor(Math.random()* 10000))
    }
     window.location = `room.html?room=${inviteCode}`
})