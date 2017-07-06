<script>

    export default {
        props: ['attributes'],

        data () {
            return {
                editing: false,
                body: this.attributes.body,  //reply.body
            }
        },

        methods: {
            update () {

                //let base_url = 'http://localhost/laraschool/public/';

                axios.patch('../../replies/' + this.attributes.id, {
                    body: this.body
                });

                this.editing = false;

                flash('Updated!');
            }
        }
    }
</script>
