window.addEventListener('load', ()=>{
    let long;
    let lat;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            long = position.coords.longitude;
            lat = position.coords.latitude;

            const proxy = "https://cors-anywhere.herokuapp.com/";
            const api = '$(proxy)https://api.darksky.net/forecast/2a0f3f6900c5cd7f7868d3369eed653c/${lat},${long}';
        
            fetch(api)
            .then(response =>{
                return response.json();
            })
            .then(data =>{
                console.log(data);  
                const { temperature, summary } = data.currently;
            });
        
        });

       
    }

});