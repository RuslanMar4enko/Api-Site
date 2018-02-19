<template>
    <footer style="position: relative;">
        <div class="">
            <ul class="navbar-nav" style="padding-left: 0;">
                <li class=""><router-link :to="{name:'index'}" exact>{{ $t('Home') }}</router-link></li>
                <li class=""><router-link :to="{name:'contacts'}">{{ $t('Contacts') }}</router-link></li>
                <li><router-link :to="{name:'products'}">{{ $t('Products') }}</router-link></li>
                <li><img src="../../image/footer/Logo_Veloman-03.png" alt=""></li>
                <!--<li class=""><router-link :to="{name:'gallery'}">{{ $t('Gallery') }}</router-link></li>-->
                <li class=""><router-link :to="{name:'site-map'}">{{ $t('Site Map') }}</router-link></li>
                <li class=""><router-link :to="{name:'partners'}">{{ $t('Partners') }}</router-link></li>
            </ul>

        </div><!-- /.navbar-collapse -->
        <p class="copirat">{{ $t('designed_by') }}</p>
    </footer>
</template>

<script>
    export default {}
</script>