<template>
<div class="columns">
        <div class="column is-12" id='mapper'></div>
        <b-loading :is-full-page="false" :active.sync="isLoading"></b-loading>
</div>
</template>

<script>
import mapboxgl from "mapbox-gl";

export default {
    props: {
        location: {
            default: Object,
        }
    },
    data() {
        return {
            accessToken: 'pk.eyJ1IjoicmthY2Vuc2tpIiwiYSI6ImNpb25ub2IwZzAwMGx1Ym02N2hhdjF0anQifQ.FaquQXUDfv74AhJgZ-v8JA',
            mapStyle: 'mapbox://styles/mapbox/streets-v11',
            isLoading: false,
        }
    },

    methods: {
        createMap() {
            mapboxgl.accessToken = this.accessToken;
            // init the map
            this.mapbox = new mapboxgl.Map({
                container: 'mapper',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [-77.9447, 34.2257],
                zoom: 10
            });
        }
    },

    watch: {
        location(loc) {
            if(!this.isLoading) {
                new mapboxgl.Marker()
                    .setLngLat(loc.cords)
                    .addTo(this.mapbox);

                this.mapbox.flyTo({
                    center: loc.cords,
                    zoom: 15
                })  
            }
        }
    },

    mounted() {
        this.createMap()
    }
}
</script>

<style lang="scss">
.mapboxgl-map { height: 600px; position:absolute; width: 100%; }
</style>