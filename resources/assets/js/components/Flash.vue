<template>

    <div class="alert alert-success alert__flash" role="alert" v-show="show">

        <strong>Success!</strong> {{ body }}

    </div>

</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
                body: '',
                show: false
            }
        },
        created() {
            if (this.message) {
                this.flash(this.message);
            }
            //listen for the event 'flash', when pick up the message, show it for 3sec
            window.events.$on(
                'flash', message => this.flash(message)
            );
        },
        methods: {
            flash(message) {
                this.body = message;
                this.show = true;
                this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    };
</script>

<style>
    .alert__flash{
        position: fixed;
        right: 25px;
        bottom: 25px;
    }

</style>
