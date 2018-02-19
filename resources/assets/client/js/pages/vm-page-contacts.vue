<template>
    <div class="wrapper">
        <section class="breadcrump contacts__breadcrump">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <router-link :to="{name: 'index'}" exact> {{ $t('Home') }} </router-link>
                        >
                        <span> {{ $t('Contacts') }} </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="contacts-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 contacts-main-1">
                        <h1>{{ $t('About Us') }}</h1>
                        <hr/>
                        <p class="text-justify">
                            {{ $t('vm_page_contacts.content') }}
                        </p>

                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12 contacts-main-2">
                        <h1>{{ $t('Contacts') }}</h1>
                        <hr/>
                        <p><i class="fa fa-globe" aria-hidden="true"></i> veloman-extreme.ge</p>
                        <p><i class="fa fa-skype" aria-hidden="true"></i> veloman_extreme_ge</p>
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i> info@veloman-extreme.ge</p>
                        <img src="../../image/viber.png" alt=""> <i class="fa fa-whatsapp" aria-hidden="true"></i>
                        <p>+995555916421 {{ $t('Mykhailo Diuba') }}</p>
                        <p><i class="fa fa-facebook" aria-hidden="true"></i> veloman_extreme_ge</p>

                    </div>


                </div>
            </div>
        </section>


        <!--<section class="contacts-map col-xs-12">-->


        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387373.4065419131!2d-74.03308943514216!3d40.66615215694421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2z0JzQsNC90YXRjdGC0YLQtdC9LCDQndGM0Y4t0JnQvtGA0LosINCh0KjQkA!5e0!3m2!1sru!2sua!4v1491929007381"-->
        <!--height="600" frameborder="0" style="border:0" allowfullscreen></iframe>-->


        <!--</section>-->
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmBreadCrumps from '../components/vm-bread-crumps.vue'

    export default {
        components: {
            vmBreadCrumps
        },
    }
</script>