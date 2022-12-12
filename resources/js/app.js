import './bootstrap';

window.Echo.channel("my-channel")
    .listen('MyEvent', (e)=>{
      alert(e.message)
    })
