// function myhome() {
//     alert('hello');
// }




function time() {

    const currentTime = new Date();
    const year = currentTime.getFullYear();
    const yearHtml = document.getElementById('year').innerHTML = year;
    const day = currentTime.getDay();
    const days = {
        '1':'mon',
        '2':'tue',
        '3':'wed',
        '4':'thur',
        '5':'fri',
        '7':'sat',
        '0': 'sun'
    };
    let weekday = days[day];
    const dayhtml = document.getElementById('days').innerHTML = weekday;
    const hours = currentTime.getHours();
    const hoursHtml = document.getElementById('hours').innerHTML = hours;

     const minutes = currentTime.getMinutes();
    const minutesHtml = document.getElementById('minutes').innerHTML = minutes;
    
     const seconds = currentTime.getSeconds();
     const secondsHtml = document.getElementById('seconds').innerHTML = seconds;
    
    console.log(weekday);
}
setInterval(time, 1000);
time();
