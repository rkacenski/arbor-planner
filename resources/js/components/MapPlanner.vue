<template>
<div class="columns">
        <div class="column is-12" id='mapper'></div>
        <b-loading :is-full-page="false" :active.sync="isLoading"></b-loading>
</div>
</template>

<script>
import mapboxgl from "mapbox-gl";
import MapboxDirections from '@mapbox/mapbox-gl-directions/dist/mapbox-gl-directions';

export default {
    props: {
        locations: {
            default: Array,
        }
    },
    data() {
        return {
            accessToken: 'pk.eyJ1IjoicmthY2Vuc2tpIiwiYSI6ImNpb25ub2IwZzAwMGx1Ym02N2hhdjF0anQifQ.FaquQXUDfv74AhJgZ-v8JA',
            mapStyle: 'mapbox://styles/mapbox/streets-v11',
            isLoading: true,
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

            this.directions = new MapboxDirections({
                accessToken: this.accessToken,
                profile: 'mapbox/driving-traffic'
            })

            this.mapbox.addControl(this.directions, 'top-left');

            this.mapbox.on('load', () => {
                this.isLoading = false
            })
        }
    },

    watch: {
        isLoading(val) {
            if(!val) {
                console.log('here');

                this.directions.setOrigin([-77.9447, 34.2257])
                this.directions.addWaypoint(0, [
                        -77.948595,
                        34.234196
                    ])

                this.directions.addWaypoint(1, [-77.991502, 34.2083284])
                this.directions.setDestination([-77.9447, 34.2257])
                
                

                

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