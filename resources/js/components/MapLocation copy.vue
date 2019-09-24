<template>
<div class="tile is-ancestor">
    <div class="tile is-vertical">
        <MglMap
            ref="mapLoc"
            :accessToken="accessToken"
            :mapStyle="mapStyle"
            @load="onMapLoad"
            :center="[-77.9447, 34.2257]"
            :zoom="12">
                <MglNavigationControl position="top-left" />
                
                <template v-if="location">
                    <MglMarker :coordinates="location.cords">
                        <MglPopup showed :closeButton="false">
                                <div>{{ location.address }}</div>
                        </MglPopup>
                    </MglMarker>
                </template>
        </MglMap>
        <b-loading :is-full-page="false" :active.sync="isLoading"></b-loading>
    </div>
</div>
</template>

<script>
import Mapbox from "mapbox-gl";
import {
    MglMap,
    MglNavigationControl,
    MglMarker,
    MglPopup
} from "vue-mapbox";

export default {
    components: { 
        MglMap,
        MglNavigationControl,
        MglMarker,
        MglPopup
    },
    props: {
        location: {
            default: Object,
        }
    },
    data() {
        return {
            accessToken: 'pk.eyJ1IjoicmthY2Vuc2tpIiwiYSI6ImNpb25ub2IwZzAwMGx1Ym02N2hhdjF0anQifQ.FaquQXUDfv74AhJgZ-v8JA',
            mapStyle: 'mapbox://styles/mapbox/streets-v11',
            isLoading: true,
            actions: null,
            mapbox: Mapbox
        }
    },

    methods: {
        onMapLoad(event) {
            this.isLoading = false
            
            this.actions = event.component.actions
        },

        flyTo(cords) {
            return this.actions.panTo(cords)
        }
    },

    watch: {
        location(loc) {
            if(!this.isLoading) {
                console.log(loc.cords);
                this.flyTo(loc.cords)
                
            }
        }
    },

    created() {
        
    }
}
</script>

<style lang="scss">
.mgl-map-wrapper { position:absolute; }
</style>