<template>
<layout>
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-4 is-faded-green">
                <div v-for="work in data" :key="work.id" class="box">
                    <div class="field is-grouped is-grouped-multiline">
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-dark">Name</span>
                                <span class="tag is-info">{{ work.estimate.name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <map-planner
                    :locations="data">
                </map-planner>
            </div>
        </div>
    </div>
</layout>
</template>
<script>
import Layout from './Layout.vue'
import MapPlanner from '../../components/MapPlanner'
export default {
    components: {Layout, MapPlanner},
    data() {
        return {
            data: this.$page.work_orders,
        }
    }
}
</script>