const sideBar = document.querySelector('aside')
const openBtn = document.querySelector('#unToggle-btn')
const logo = document.querySelector('#header-logo')
const logoH2=document.querySelector('#header-logo-h2')
const theme=document.querySelector('.theme');
const themeSpans=theme.querySelectorAll('span')
const bdy = document.querySelector('body');
var rt = document.querySelector(':root');
let clickMenu=false
let clickTheme=false
theme.addEventListener('click',()=>
{
    if(!clickTheme)
    {
        darkMode();
        clickTheme=true;
        themeSpans[0].classList.remove('active');
        themeSpans[1].classList.add('active');
        themeSpans[1].style.color='#101828'
    }else{
        lightMode();
        clickTheme=false;
        themeSpans[0].classList.add('active');
        themeSpans[1].classList.remove('active');
        themeSpans[1].style.color='#ffffff'
    }
    
})
openBtn.addEventListener('click',()=>{
    if(!clickMenu)
    {
    sideBar.style.display='inline-block'
    logo.style.display='inline-block'
    logoH2.style.display='inline-block'
    clickMenu=true;
    }else{
    sideBar.style.display='none'
    logo.style.display='none'
    logoH2.style.display='none'
    clickMenu=false;
    }
    
})
 function darkMode()
 {
    rt.style.setProperty('--Side-Bar-background-light','#1e2121')
    rt.style.setProperty('--active-text-light','#a68973')
    rt.style.setProperty('--top-bar-light','#6941c6')
    rt.style.setProperty('--btn-hover-light','#7756d9')
    rt.style.setProperty('--bdy-background-light','#171a21')
    rt.style.setProperty('--text-light','#ffffff')
    rt.style.setProperty('--link-hover-light','#242632')
    rt.style.setProperty('--active-btn-light','#b692f6')
    rt.style.setProperty('--dash-card-light','#172134')
    rt.style.setProperty('--btn-background-light','#7a5af8')
    rt.style.setProperty('--btn-text','#ffffff')

 }
 function lightMode()
 {
    rt.style.setProperty('--Side-Bar-background-light','#f7faff')
    rt.style.setProperty('--active-text-light','#816578')
    rt.style.setProperty('--top-bar-light','#6941c6')
    rt.style.setProperty('--btn-hover-light','#6941c6')
    rt.style.setProperty('--bdy-background-light','#e9eaf5')
    rt.style.setProperty('--text-light','#101828')
    rt.style.setProperty('--link-hover-light','#e4e4f8')
    rt.style.setProperty('--active-btn-light','#7a5a78')
    rt.style.setProperty('--dash-card-light','#ffffff')
    rt.style.setProperty('--btn-background-light','#7a5af8')
    rt.style.setProperty('--btn-text','#ffffff')

    
 }
