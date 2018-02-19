<template>
    <section class="product2">
        <div class="container">
            <div class="widgets">
                <div class="widgets__item" v-for="widget in widgets">
                    <img
                            v-if="widget[image]"
                            :src="widget[image][thumbnailUrl]"
                            :alt="widget[image][imageName]"
                    >
                    <p class="widgets__description">{{ widget[description] }}</p>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            widgets: {},
            thumbnailUrl: {
                default: 'widget_thumbnail'
            },
            imageName: {
                default: 'name'
            },
            description: {
                default: 'description'
            },
            image: {
                default: 'image'
            }
        },
    }
</script>