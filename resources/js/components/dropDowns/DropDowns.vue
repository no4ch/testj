<template>
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Тестовое задание</h1>
                <div class="d-flex " v-if="countries.length">
                    <div class="col-4">
                        <label for="countryFormControlSelect">Страны</label>
                        <select class="form-control"
                                id="countryFormControlSelect"
                                v-model="selectedCountry">
                            <option
                                v-for="country in countries"
                                :value="country.id"
                                :key="country.id">
                                {{ country.name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-4" v-if="regions.length">
                        <label for="regionFormControlSelect">Области</label>
                        <select class="form-control" id="regionFormControlSelect" v-model="selectedRegion">
                            <option
                                v-for="region in regions"
                                :value="region.id"
                                :key="region.id">
                                {{ region.name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-4" v-if="cities.length">
                        <label for="cityFormControlSelect">Города</label>
                        <select class="form-control" id="cityFormControlSelect" v-model="selectedCity">
                            <option
                                v-for="city in cities"
                                :value="city.id"
                                :key="city.id">
                                {{ city.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

    </main>
</template>

<script>
    export default {
        name: "DropDowns",
        data: () => ({
            countries: [],
            regions: [],
            cities: [],
            selectedCountry: "",
            selectedRegion: "",
            selectedCity: "",
        }),
        methods: {
            test() {
                console.log(this.selectedCountry)
            },
            fetchCountries() {
                axios.get("/api/countries").then(response => {
                    this.countries = response.data
                    if (this.countries.length){
                        this.selectedCountry = this.countries[0].id
                    }
                })
            },
            fetchRegions(countryId) {
                this.cities = []
                this.regions = []
                axios.get(`/api/countries/${countryId}/regions`).then(response => {
                    this.regions = response.data
                    if (this.regions.length){
                        this.selectedRegion = this.regions[0].id
                    }
                })
            },
            fetchCities(regionId){
                this.cities = []
                axios.get(`/api/regions/${regionId}/cities`)
                .then(response => {
                    this.cities = response.data
                    if (this.cities.length){
                        this.selectedCity = this.cities[0].id
                    }
                })
            },
        },
        created() {
            this.fetchCountries()
        },
        watch: {
            selectedCountry(){
                this.fetchRegions(this.selectedCountry)
            },
            selectedRegion(){
                this.fetchCities(this.selectedRegion)
            }
        },
    }
</script>

<style scoped>

</style>
