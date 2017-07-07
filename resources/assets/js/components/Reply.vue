<script>

    import Favorite from './Favorite.vue'; //child component

    export default {
        props: ['attributes'],

        components : { Favorite }, //reference the child component

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

                flash('Your reply has been updated!');
            },
            destroy () {
                axios.delete('../../replies/' + this.attributes.id);

                $(this.$el).fadeOut(300, () => {
                    flash('Your reply has been deleted.');
                });
            },
            cancel ()
            {
                this.body = this.attributes.body;
                this.editing = false;
            }
        }
    }
</script>
