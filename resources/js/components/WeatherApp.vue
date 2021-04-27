<template>
  <div class="text-white mb-8">

    <div class="weather-container font-sans w-128 max-w-lg rounded-lg overflow-hidden bg-gray-900 shadow-lg mt-8">
      <div class="current-weather flex items-center justify-between px-6 py-8">
        <div class="flex items-center">
          <div>
            <div class="text-6xl font-semibold">{{currentTemperature.actual}}°C</div>
            <div>Feels like {{currentTemperature.feels}}°C</div>
          </div>
          <div class="mx-5">
            <div class="font-semibold">{{currentTemperature.summary}}</div>
            <div>{{ location.name }}</div>
          </div>
        </div>
        <div>
          <img :src="currentTemperature.icon" />
        </div>
      </div> <!-- end current-weather -->

      <div class="upcoming-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden">
        <div
          v-for="(day,index) in daily"
          :key="day.dt"
          :class="{'mt-8': index > 0}"
          class="flex items-center mt-8"
        >
          <div class="w-1/6 text-lg text-gray-200">{{toWeekDay(day.dt)}}</div>
          <div class="w-2/3 px-4 flex items-center">
            <div>
              <img :src="forecastIcon(day.weather[0].icon)" width="70px" />
            </div>
            <div class="ml-3">{{day.weather[0].description}}</div>
          </div>
          <div class="w-1/6 text-right">
            <div>{{Math.round(day.temp.max)}}°C</div>
            <div>{{Math.round(day.temp.min)}}°C</div>
          </div>
        </div>
      </div> <!-- end upcoming-weather -->

    </div> <!-- end weather-container -->
  </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchData()
        },
      data(){
        return{
          api_key: process.env.MIX_OPENWEATHER_KEY,
          currentTemperature: {
            actual: '',
            feels: '',
            summary: '',
            icon: ''
          },
          daily: [

          ],
          location:{
            name: 'Harrogate',
            lat: 53.992119,
            lng: -1.541812,
          }
        }
      },
      methods:{
          fetchData(){
            fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${this.location.lat}&lon=${this.location.lng}&appid=${this.api_key}&units=metric`)
            .then(response => response.json())
            .then(data => {
              console.log(data)
              this.currentTemperature.actual = Math.round(data.main.temp)
              this.currentTemperature.feels = Math.round(data.main.feels_like)
              this.currentTemperature.summary = data.weather[0].description,
                this.currentTemperature.icon =  `http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`,
                this.location.name = data.name
            })

            fetch(
              `https://api.openweathermap.org/data/2.5/onecall?lat=${this.location.lat}&lon=${this.location.lng}&appid=${this.api_key}&units=metric`)
              .then(response => response.json())
              .then(data => {
                this.daily = data.daily
              })
          },
        toWeekDay(timestamp){
            const newDate = new Date(timestamp * 1000);
            const days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']
          return days[newDate.getDay()]
        },
        forecastIcon(icon){
            let iconId = icon
          return `http://openweathermap.org/img/wn/${iconId}@2x.png`
        }
      },
      computed:{

      }
    }
</script>

