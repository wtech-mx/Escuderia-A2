                <p style="display: none">{{ $userId = Auth::id() }}</p>

                <div class="row bg-blue">
                    <div class="navbar">

                        <div class="navbar__item -blue">
                            <a href="{{ route('index.dashboard') }}">
                                <span class="navbar__icon">
                                    <img class="" src="{{ asset('img/icon/color/icon-home.png') }}" width="25px">
                                </span>
                            </a>
                        </div>

                        <div class="navbar__item -orange">
                            <a href="#">
                                <span class="navbar__icon">
                                    <img class="" src="{{ asset('img/icon/color/trophy.png') }}" width="25px">
                                </span>
                            </a>
                        </div>

                        <div class="navbar__item -yellow">
                            <a href="{{ route('index_exp') }}">
                                <span class="navbar__icon">
                                    <img class="" src="{{ asset('img/icon/color/document.png') }}" width="25px">
                                </span>
                            </a>
                        </div>

                        <div class="navbar__item -purple">
                            <a href="{{ route('edit.profile', $userId) }}">
                                <span class="navbar__icon">
                                    <img class="" src="{{ asset('img/icon/color/user.png') }}" width="25px">
                                </span>
                            </a>
                        </div>

                        <div class="navbar__item -camel">
                            <a href="{{ route('calendar.index_calendar_user') }}">
                                <span class="navbar__icon">
                                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
