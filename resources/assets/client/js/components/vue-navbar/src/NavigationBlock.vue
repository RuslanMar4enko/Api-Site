<template>
        <div class="breadcrumbs">
            <router-link class="breadcrumbs__item"
                         v-for="route in nestedRoutes"
                         :key="route.name"
                         :to="{name: route.name}"
                         v-text="$t(composeName(route))"
            />
        </div>
</template>

<script>
  // Component creates navigation panel for your routes.
  // Routes you want to be displayed should have name attribute.

  import ObjectHelpers from './Utility/ObjectHelpers.js'

  export default {
    name: 'NavigationBlock',
    props: {
      routes: {
        type: Array,
        required: true,
      }
    },
    methods: {
      composeName (route){
        if (route.meta && route.meta.title) {
          return route.meta.title
        }

        return route.name
      }
    },
    computed: {
      nestedRoutes () {
        return ObjectHelpers
            .traverseBranch(this.routes, { name: this.$route.name })
            .filter(route => !Array.isArray(route))
      },
      nestedParents () {
        return this.nestedRoutes.filter(route => route.children)
      },
    },
  }
</script>

<style lang="scss" rel="stylesheet/scss">


    .breadcrumbs {
        padding: 3px;
        &__item {
            & + & {
                &:before {
                    content: '/';
                    margin-right: 5px;
                    margin-left: 5px;
                }
            }
            &.active{
                box-shadow: none;
                color: #E92C32;
            }

        }
    }
</style>
