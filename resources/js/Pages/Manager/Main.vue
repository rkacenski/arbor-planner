<template>
<layout>
    <div class="container is-fluid">
        <div class="columns is-tall">
            <div class="column is-4 is-faded-green">
                
                <template v-if="view == 'add'">
                    <a @click="view = 'list'"
                        class="button is-info is-small margin">
                        Cancel
                    </a>
                    <add-estimate
                        @created="addEstimate">
                    </add-estimate>
                </template>

                <template v-if="view === 'list'">
                    <a @click="view = 'add'"
                        class="button is-info is-small margin">
                        Add Estimate
                    </a>
                    <b-table
                        :data="data"
                        :columns="columns"
                        @update:selected="selectedEstimate">
                    </b-table>
                </template>
                

                <template v-if="view == 'item'">
                    <a @click="view = 'list'"
                        class="button is-info is-small margin">
                        Back
                    </a>
                    <view-estimate
                        :estimate="currentEstimate"
                        @completed="view = 'list'"></view-estimate>
                </template>
            </div>

            <div class="column">
                <map-location :location="currentEstimate"></map-location>
            </div>
        </div>
    </div>
</layout>
</template>

<script>

import AddEstimate from '../../components/AddEstimate'
import ViewEstimate from '../../components/ViewEstimate'
import MapLocation from '../../components/MapLocation'
import Layout from './Layout.vue'
export default {
    components: { Layout, AddEstimate, MapLocation, ViewEstimate },
    data() {
        return {
            view: 'list',
            isActive: true,
            isAddEstimateActive: false,
            data: this.$page.estimates,
            columns: [
                {
                    field: 'status',
                    label: 'Status',
                    centered: true
                },
                {
                    field: 'name',
                    label: 'Name',
                },
                {
                    field: 'phone',
                    label: 'Phone',
                },
                {
                    field: 'created_at',
                    label: 'Created',
                    centered: true
                },
            ],
            currentEstimate: null,
        }
    },
    methods: {
        addEstimate(e) {
            this.$page.estimates.push(e)
            this.isAddEstimateActive = false
            this.view = 'list'
        },

        selectedEstimate(e) {
            this.view = 'item'
            this.currentEstimate = e
        },
    },

    computed: {
        locations(){
            if(this.currentEstimate)
                return [ this.currentEstimate ]
            return false
        }
    }
}
</script>

<style lang="css" scoped>
.padding {
    padding: 1.5rem;
}

.margin {
    margin: 1.5rem;
}
</style>