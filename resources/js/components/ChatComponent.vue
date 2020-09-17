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
                        <div class="media-body" @click="chatById(value.message.conversation_id)">
                          <div>
                            <div  class="user-name" id="name">{{value.user.name}}</div>
                            <div class="user-last-chat">{{value.message.text}}</div>
                            
                          </div>
                          <div>
                            <div class="last-chat-time block" v-if="value.message">{{ value.message.created_at | moment("from") }}</div>
                           
                           
                          </div>
                        </div>
                      </a>
                     
                    </div>
                  </div>
                </div>
                <!-- /Chat Left -->
                
                <!-- Chat Right -->
                <div class="chat-cont-right" >
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

                        <li class="media sent" v-if="msg.sender.id==authUser.id">
                          <div class="media-body">
                            <div class="msg-box">
                              <div >
                                <p>{{ msg.text }}</p>
                                <ul class="chat-msg-info">
                                  <li>
                                    <div class="chat-time">
                                      <span>{{ msg.created_at | moment("hh:mm A") }}</span>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="media received" v-if="msg.sender.id !==authUser.id">
                          <div class="avatar">
                            <img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
                          </div>
                          <div class="media-body">
                            <div class="msg-box">
                              <div >
                                <p>{{ msg.text }}</p>
                                <ul class="chat-msg-info">
                                  <li>
                                    <div class="chat-time">
                                      <span>{{ msg.created_at | moment("hh:mm A") }}</span>
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
                      <input @keyup.enter="send" type="text" v-model="text" :name="text" class="input-msg-send form-control" placeholder="Type something">
                      <div class="input-group-append">
                        <button type="button" class="btn msg-send-btn" @click.prevent="send" id="btn-chat"><i class="fab fa-telegram-plane"></i></button>
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
            name:'',
            ids:'',
            status:'',
            conversationId : '',
                channel : '',
                messages :[],
                withUser : [],
                text : '',
                constraints : {
                    audio: false,
                    video: true
                },
           
            
          }
        },
     
        
        created() {
            this.getData();
            this.listenForNewMessage();
       
        },
        methods: {
          scrolltoBottom(){

          },

  
          
          getData(){
            axios.get('dp/video_chat').then((res)=>{
            this.values = res.data.conversations;
            this.authUser=res.data.authUser;

        // console.log(res.data.authUser)
          }).catch((err) => {
            console.log(err)
          });
          },
          chatById(id){
            axios.get('dp/video_chat/'+id).then((res)=>{
            this.messages=res.data.conversation.messages;
            this.conversationId = res.data.conversation.conversationId;
                this.channel = res.data.conversation.channel_name;
                this.withUser = res.data.conversation.user;
       
          }).catch((err) => {
            console.log(err)
          });
          },
         
          send() {
           
               axios.post('dp/video_chat',{
                    conversationId : this.conversationId,
                    text: this.text,
                }).then((response) => {
                    this.text = '';
                });
            },
            sendFiles() {
                var data = new FormData();

                $.each(files, function(key, value)
                {
                    data.append('files[]', value);
                });

                data.append('conversationId' , this.conversationId);

                axios.post('/chat/message/send/file', data);
            },
            listenForNewMessage: function () {
                Echo.join(this.channel)
                    .here((users) => {
                        console.log(users)
                    })
                    .listen('\\PhpJunior\\LaravelVideoChat\\Events\\NewConversationMessage', (data) => {
                        var self = this;
                        if ( data.files.length > 0 ){
                            $.each( data.files , function( key, value ) {
                                self.conversation.files.push(value);
                            });
                        }
                        console.log(data)
                        this.messages.push(data);
                    })
                    .listen('\\PhpJunior\\LaravelVideoChat\\Events\\VideoChatStart', (data) => {

                        if(data.to != this.authUser.id){
                            return;
                        }

                        if(data.type === 'signal'){
                            onSignalMessage(data);
                        }else if(data.type === 'text'){
                            console.log('received text message from ' + data.from + ', content: ' + data.content);
                        }else{
                            console.log('received unknown message type ' + data.type + ' from ' + data.from);
                        }
                    });
            },
            
           
           

      },
     

    }

      
</script>

<style>


</style>
