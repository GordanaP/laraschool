<template>
    <div>
        <button :class="classes" @click="toggle">
            <i class="icon_heart"></i>
            <span v-text="favoritesCount"></span>
        </button>
    </div>
</template>

<script>

    export default {
        props: ['reply'],

        data () {
            return {
                favoritesCount: this.reply.favoritesCount,
                isFavorited: this.reply.isFavorited
            }
        },

        computed: {
            classes () {
                return ['btn', this.isFavorited ? 'btn-danger' : 'btn-default'];
            },

            url () {
                return '../../replies/' + this.reply.id + '/favorites';
            }
        },
        methods: {
            toggle () {
                this.isFavorited ? this.unfavorite() : this.favorite();
            },
            favorite () {
                axios.post(this.url);

                this.isFavorited = true;
                this.favoritesCount++;
            },
            unfavorite() {
                axios.delete(this.url);

                this.isFavorited = false;
                this.favoritesCount--;
            }
        }
    }

</script>