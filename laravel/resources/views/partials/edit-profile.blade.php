           <!-- Basic Information
                          ================================================= -->
            <div class="edit-profile-container">
                <div class="edit-block">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="email">Фото профиля</label>
                            <br>
                            <img width="120" height="120" src="{{asset('/storage/'.$user->avatar)}}" alt="">
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="firstname">Full name</label>
                                <input id="firstname" class="form-control input-group-lg" type="text" name="name" value="{{empty($user->name) ? "" : $user->name}}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="email">My email</label>
                                <input id="email" disabled class="form-control input-group-lg" type="text" name="email" value="{{empty($user->email) ? "" : $user->email}}" />
                            </div>
                        </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="profession">Profession</label>
                            <input id="profession" class="form-control input-group-lg" type="text" name="profession"  value="{{empty($user->profession) ? "" : $user->profession}}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="status">Status</label>
                            <input id="status" class="form-control input-group-lg" type="text" name="status"  value="{{empty($user->status) ? "" : $user->status}}" />
                        </div>
                    </div>
                    <label>
                        <p class="custom-label"><strong>Date of Birth</strong></p>
                        <input type="date" name="Birth" class="form-control" value="{{empty($user->Birth) ? "" : $user->Birth->format('Y-m-d')}}">
                    </label>
                    <div class="row">
                            <div class="form-group col-xs-7">
                                <label for="city"> My city</label>
                                <input id="city" class="form-control" type="text" name="city" title="Enter city" placeholder="Your city" value="{{empty($user->city) ? "" : $user->city}}"/>
                            </div>
                            <div class="form-group col-xs-7">
                                <label for="country">My country</label>
                                <input id="city" class="form-control" type="text" name="country" title="Enter country" placeholder="Your country" value="{{empty($user->country) ? "" : $user->country}}"/>
                            </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="my-info">About me</label>
                                <textarea id="my-info" name="about" class="form-control" placeholder="Some texts about me" rows="4" cols="400">{{empty($user->about) ? "" : $user->about}}</textarea>
                            </div>
                        </div>
                </div>
            </div>
    <div class="edit-profile-container">
        <div class="edit-block">
            <div class="row">
                <p class="custom-label"><strong>Add interests</strong></p>
                <select name="interests[]" class="form-control" id="tags" multiple="multiple">
                    @foreach($tags = \App\Tag::all() as $tag)
                        @if($user->isTag($tag))
                            <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                            @else
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="row">
                <p class="custom-label"><strong>Languages</strong></p>
                <select name="lang[]" class="form-control" id="tags" multiple="multiple">
                    @foreach($languages = \App\Language::all() as $language)
                        @if($user->isLanguage($language))
                            <option value="{{$language->id}}" selected>{{$language->language}}</option>
                        @else
                            <option value="{{$language->id}}">{{$language->language}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
