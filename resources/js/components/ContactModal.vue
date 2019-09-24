<template>
    <div class="modal" :class="{'is-active': show }">
        <div class="modal-background" @click="show = false"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">What can we help you with?</p>
                <button class="delete" aria-label="close" @click="show = false"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input">
                    </div>
                </div>

                <div class="field has-addons">
                    
                    <p class="control">
                        <a class="button is-static">
                        Best way to contact you?
                        </a>
                    </p>

                    <div class="control">
                        <a class="button is-info">
                        Search
                        </a>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Textarea"></textarea>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success">Save changes</button>
            </footer>
        </div>
    </div>  
</template>

<script>
export default {
    props: {
        value: {
            default: false,
            type: Boolean
        }
    },
    computed: {
        show: {
            get () {
                return this.value
            },
            set (value) {
                this.$emit('input', value)
            }
        }
    }
}
</script>
