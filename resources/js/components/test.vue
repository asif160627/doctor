<template>
  <div class="col-md-7 col-lg-8 col-xl-9 mb-10">
    
          <div class="row">
            <div class="col-xl-12">
              <div class="chat-window">
              
                <!-- Chat Left -->
                <div class="chat-cont-left">
                  <div class="chat-header">
                    <span>Chats</span>
                    <a href="javascript:void(0)" class="chat-compose">
                      <i class="material-icons">control_point</i>
                    </a>
                  </div>
                  <form class="chat-search">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <i class="fas fa-search"></i>
                      </div>
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                  </form>
                  <div class="chat-users-list" >
                    <div class="chat-scroll">
                      <a  href="javascript:void(0);" class="media" v-for="value in values" :key="value.id">
                        <div class="media-img-wrap">
                          <div class="avatar avatar-away">
                            <img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
                          </div>
                        </div>
                        <div class="media-body" @click="chatById(value.id)">
                          <div>
                            <div  class="user-name" id="name" v-if="value.auth_id!=authUser.id">{{value.user2.name}}</div>
                            <div  class="user-name" id="name" v-if="value.auth_id==authUser.id">{{value.user.name}}</div>
                            <div class="user-last-chat" v-if="value.lastmsg">{{value.lastmsg.message}}</div>
                            
                          </div>
                          <div>
                            <div class="last-chat-time block" v-if="value.lastmsg">{{ value.lastmsg.created_at | moment("from") }}</div>
                           
                           
                          </div>
                        </div>
                      </a>
                     
                    </div>
                  </div>
                </div>
                <!-- /Chat Left -->
                
                <!-- Chat Right -->
                <div class="chat-cont-right" v-if="ids!=''">
                  <div class="chat-header">
                    <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                      <i class="material-icons">chevron_left</i>
                    </a>
                    <div class="media">
                      <div class="media-img-wrap">
                        <div class="avatar avatar-online">
                          <img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                      </div>
                      <div class="media-body">
                        <div class="user-name" >{{name}}</div>
                        <div class="user-status">{{status}}</div>
                      </div>
                    </div>
                    <div class="chat-options">
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
                        <i class="material-icons">local_phone</i>
                      </a>
                      <a @click="startVideoCallToUser(authid)" href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
                        <i class="material-icons">videocam</i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="material-icons">more_vert</i>
                      </a>
                    </div>
                  </div>
                  <div class="chat-body mb-20">
                    <div class="chat-scroll" v-chat-scroll>
                      <ul class="list-unstyled " v-for="msg in messages" :key="msg.id" >

                        <li class="media sent" v-if="msg.sender==authUser.id">
                          <div class="media-body">
                            <div class="msg-box">
                              <div>
                                <p>{{ msg.message }}</p>
                                <ul class="chat-msg-info">
                                  <li>
                                    <div class="chat-time">
                                      <span>{{ msg.created_at | moment("HH:mm A") }}</span>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="media received" v-if="msg.sender!=authUser.id">
                          <div class="avatar">
                            <img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
                          </div>
                          <div class="media-body">
                            <div class="msg-box">
                              <div >
                                <p>{{ msg.message }}</p>
                                <ul class="chat-msg-info">
                                  <li>
                                    <div class="chat-time">
                                      <span>{{ msg.created_at | moment("HH:mm A") }}</span>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            
                            
                          </div>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
                  <div class="chat-footer">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="btn-file btn">
                          <i class="fa fa-paperclip"></i>
                          <input type="file"   v-on:change="sendFiles()" multiple="1">
                        </div>
                      </div>
                      <input @keyup.enter="sendMessage" type="text" v-model="newMessage" :name="newMessage" class="input-msg-send form-control" placeholder="Type something">
                      <div class="input-group-append">
                        <button type="button" class="btn msg-send-btn" @click.prevent="send()" id="btn-chat"><i class="fab fa-telegram-plane"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Chat Right -->
                
              </div>
            </div>
          </div>
          <!-- /Row -->

       
  </div>
</template>

<script>

    export default {
      
        data: function () {
          return {
           
           values:[],
           messages: [],
            newMessage: "",
            channel: "",
            authUser:[],
            conversationId:'',
            name:'',
            ids:'',
            status:'',
           
            
          }
        },
     
        
        created() {
            this.getData();
            this.listenForNewMessage();
       
        },
        methods: {
          scrolltoBottom(){

          },

        sendMessage() {
          this.messages.push({
            message:this.newMessage,
            sender:this.authUser.id,
            created_at:Date(Date.now())
          });
             axios.post('/dp/message/send',{message:this.newMessage,conversationId:this.conversationId}).then((res)=>{
              
             this.newMessage = "";

       
          }).catch((err) => {
            console.log(err)
          });
           
        },
          
          getData(){
            axios.get('/dp/message').then((res)=>{
            this.values = res.data.user;
            this.authUser=res.data.authUser;

        // console.log(res.data.authUser)
          }).catch((err) => {
            console.log(err)
          });
          },
          chatById(id){
            axios.get('/dp/message/'+id).then((res)=>{
            this.messages=res.data.messages
            this.ids=res.data.ids
            this.name=res.data.name
            this.conversationId=id
            this.channel=this.authUser.id +'--'+id;
            
       
          }).catch((err) => {
            console.log(err)
          });
          },
         
          send() {
            if(this.text = ''){
              return;
            }
                axios.post('/dp/message/send',{
                    conversationId : this.conversationId,
                    text: this.text,
                    channel:this.channel
                }).then((response) => {
                    this.text = '';
                    console.log('sent')
                }).catch((err) => {
            console.log(err)
          });
            },
             listenForNewMessage: function () {
                Echo.join('chat').here((users) => {
                   
                })
                .joining((user) => {
                    
                })
                .leaving((user) => {
                   
                })
                .listen('SendMessage', (data) => {
                       
                        this.messages.push({
                        message:data.text,
                        sender:data.sender.id,
                        created_at:data.created_at
                      });
                    })
                   
            }
           
           

      },
     

    }

      
</script>

<style>


</style>
