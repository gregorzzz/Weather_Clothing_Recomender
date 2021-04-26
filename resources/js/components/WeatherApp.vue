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
            <div class="font-semibold">{{ currentTemperature.summary }}</div>
            <div>{{location.name}}</div>
          </div>
        </div>
        <div>
          <div>icon</div>
        </div>
      </div> <!-- end current-weather -->

      <div class="upcoming-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden">
        <div
          class="flex items-center mt-8">
          <div class="w-1/6 text-lg text-gray-200">MON</div>
          <div class="w-4/6 px-4 flex items-center">
            <div>icon</div>
            <div class="ml-3">Mostly Sunny</div>
          </div>
          <div class="w-1/6 text-right">
            <div>16°C</div>
            <div>1°C</div>
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
            fetch(`/api/weather?lat=${this.location.lat}&lng=${this.location.lng}`)
            .then(response => response.json())
            .then(data => {
              console.log(data)
              this.currentTemperature.actual = Math.round(data.main.temp)
              this.currentTemperature.feels = Math.round(data.main.feels_like)
              this.currentTemperature.summary = data.weather[0].description


            })
          }
      }
    }
</script>


