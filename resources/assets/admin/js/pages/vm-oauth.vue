<template>
    <div>
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
</template>

<script>
    import passportClients from '../../../client/js/components/passport/Clients.vue'
    import passportAuthorizedClients from '../../../client/js/components/passport/AuthorizedClients.vue'
    import passportPersonalAccessTokens from '../../../client/js/components/passport/PersonalAccessTokens.vue'
    export default {
        components: {
            passportClients,
            passportAuthorizedClients,
            passportPersonalAccessTokens,
        }
    }
</script>