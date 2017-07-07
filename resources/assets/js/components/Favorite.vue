<template>
    <div>
        <button :class="classes" @click="toggleFavorites">
            <i class="icon_heart"></i>
            <span v-text="count"></span>
        </button>
    </div>
</template>

<script>

    export default {
        props: ['reply'],

        data () {
            return {
                count: this.reply.favoritesCount,
                isFavorited: this.reply.isFavorited
            }
        },

        computed: {
            classes () {
                return [
                    'btn',
                    this.isFavorited ? 'btn-danger' : 'btn-default'
                ];
            },
            url () {
                return '../../replies/' + this.reply.id + '/favorites';
            },
        },

        methods: {
            toggleFavorites () {
                this.isFavorited ? this.unfavorite() : this.favorite();
            },
            favorite () {
                axios.post(this.url);

                this.isFavorited = true;
                this.count++;
            },
            unfavorite() {
                axios.delete(this.url);

                this.isFavorited = false;
                this.count--;
            }
        }
    }

</script>