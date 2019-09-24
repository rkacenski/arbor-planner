<template>
<div>
    <b-field label="Name">
        <b-input
            type="text"
            v-model="form.name"
            placeholder="Name"
            required>
        </b-input>
    </b-field>

    <b-field label="Email">
        <b-input
            type="email"
            v-model="form.email"
            placeholder="Email"
            required>
        </b-input>
    </b-field>

    <b-field label="Phone">
        <b-input
            type="text"
            v-model="form.phone"
            placeholder="Phone"
            required>
        </b-input>
    </b-field>

    <b-field label="Address">
        <b-autocomplete
            v-model="form.address"
            :data="data"
            field="name"
            :loading="isFetching"
            @typing="getAsyncData"
            @select="addressSelected">

            <template slot-scope="props">
                {{ props.option.name }}
            </template>
        </b-autocomplete>
    </b-field>

    <b-field label="Description">
        <b-input v-model="form.description" type="textarea"></b-input>
    </b-field>

    <b-button
        @click="create"
        :loading="api.loading"
        type="is-success">
        Create
    </b-button>
</div>
</template>
<script>
export default {
    data() {
        return {
            form: {
                name: null,
                email: null,
                phone: null,
                address: null,
                //date_needed: null,
                description: null,
            },
            api: new FormBuilder,

            data: [],
            selected: null,
            isFetching: false
        }
    },

    methods: {
        create() {
            this.api.post('/create-estimate', this.form)
                .then( ( {data, message } ) => {
                    this.$emit('created', data)
                    message('Created!')
                })
        },

        addressSelected(option) {
            this.form.address = option
            this.form.cords = option.cords
        },

         getAsyncData: _.debounce(function (address) {
             console.log(address);
             
                if (!address.length) {
                    this.data = []
                    return
                }
                this.isFetching = true
                axios.get(`https://api.mapbox.com/geocoding/v5/mapbox.places/${address}.json`, {
                    params: {
                        access_token: 'pk.eyJ1IjoicmthY2Vuc2tpIiwiYSI6ImNpb25ub2IwZzAwMGx1Ym02N2hhdjF0anQifQ.FaquQXUDfv74AhJgZ-v8JA',
                        autocomplete: true
                    }
                })
                .then( r => {
                    this.data = []
                    
                    r.data.features.forEach((item) => this.data.push({
                        name: item.place_name,
                        cords: item.center
                    }))

                    this.isFetching = false
                })
            }, 500)
    }
}
</script>