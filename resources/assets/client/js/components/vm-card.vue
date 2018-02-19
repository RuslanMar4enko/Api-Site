<template>
    <div class="card">
        <router-link :to="to" class="card__link">
            <img :src="src?src:''" alt="">
            <div class="col-xs-12">
                <p class="card-info__name">

                        {{ title | title}}

                    <span>

                        {{ oldPrice | currency }}

                    </span>
                </p>
                <p class="card-info__description">

                    {{ type | type }}

                    <br/>{{ typeDescription | type }}

                    <span>

                        {{ currentPrice | currency }}

                    </span>
                </p>
            </div>
        </router-link>
    </div>
</template>

<script>
    export default {
        props: {
            src: {},
            title: {},
            typeDescription: {},
            currentPrice: {},
            oldPrice: {},
            type: {},
            to: {},
        },
    }
</script>