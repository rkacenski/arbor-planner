<template>
<div>
    <table class="table is-hoverable">
        <tbody>
            <tr>
                <td class="has-text-weight-semibold">Status</td>
                <td>{{ estimate.status }}</td>
            </tr>
            <tr>
                <td class="has-text-weight-semibold">Name</td>
                <td>{{ estimate.name }}</td>
            </tr>
            <tr>
                <td class="has-text-weight-semibold">Email</td>
                <td>{{ estimate.email }}</td>
            </tr>
            <tr>
                <td class="has-text-weight-semibold">Phone</td>
                <td>{{ estimate.phone }}</td>
            </tr>
            <tr>
                <td class="has-text-weight-semibold">Address</td>
                <td>{{ estimate.address }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>{{ estimate.description }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <p class="title is-5 has-text-link">Create Work Order</p>


    <b-field label="Priority">
        <b-select v-model="form.priority" placeholder="Set priority">
            <option value="3">Low</option>
            <option value="2">Medium</option>
            <option value="1">High</option>
        </b-select>
    </b-field>
    <b-field label="Equipment needed">
        <b-taginput
            v-model="form.equipment"
            ellipsis
            placeholder="Add a tag">
        </b-taginput>
    </b-field>

    <b-field label="Crew needed">
        <b-numberinput
            v-model="form.crew"
            placeholder="No label"
            type="is-light">
        </b-numberinput>
    </b-field>

    <b-field label="Time on site (hours)">
        <b-numberinput
            v-model="form.hours"
            step="0.1"
            type="is-light">
        </b-numberinput>
    </b-field>

    <b-field label="Work Detail">
        <b-input v-model="form.description" type="textarea"></b-input>
    </b-field>

    <div class="buttons is-centered">
        <span class="button" @click="createWork">Create Work Order</span>
    </div>
</div>
</template>
<script>
export default {
    props: [ 'estimate' ],
    data() {
        return {
            form: {
                priority: 3,
                equipment: [],
                crew: 1,
                hours: 1,
                description: null,
            },
            api: new FormBuilder
        }
    },
    methods: {
        createWork() {
            this.api.post('/create-work-order', {
                estimate: this.estimate.id,
                form: this.form
            })
            .then( (data, message) => {
                this.$emit('completed')
            })
        }
    }
}
</script>