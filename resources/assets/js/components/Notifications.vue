<template>
	<div class="dropdown-menu">
		<a v-bind:key="notification.data.id" :href="'/' + notification.data.follower.username" class="dropdown-item bg-success text-white" v-for="notification in notifications">
			@{{ notification.data.follower.username }} te ha seguido!
		</a>
        <div class="dropdown-divider"></div>
		<a v-bind:key="notification.data.id" :href="'/' + notification.data.follower.username" class="dropdown-item" v-for="notification in notificationsLeidas">
			@{{ notification.data.follower.username }} te ha seguido!
		</a>        
	</div>
</template>

<script>
  export default {
      props: ['user'],
      data(){
          return {
              notifications: [],
              notificationsLeidas: []
          }
      },

      mounted(){
          axios.get('/api/notifications/read')
            .then(response => {
                let size = response.data.length;
                let longitud = (size>3) ? 3 : size;
                this.notificationsLeidas = (size>0)? response.data.slice(0, longitud):[];                
                Echo.private(`App.User.${this.user}`)
                    .notification(notification =>{
                        this.notificationsLeidas.unshift(notification);
                    });
            });

            axios.get('/api/notifications')
                    .then(response =>{
                        this.notifications = response.data;
                        Echo.private(`App.User.${this.user}`)
                            .notification(notification =>{
                                this.notifications.unshift(notification);
                            });  
                    });
      }
  }
</script>