@extends('layouts.app')
@section('content')
    <center>
        <table id="hnmain" border="0" cellpadding="0" cellspacing="0" width="85%" bgcolor="#f6f6ef">
            <tr>
                <td bgcolor="#ff6600">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding:2px">
                        <tr>
                            <td style="width:18px;padding-right:4px"><a href="index.html"><img src="{{asset('images/y18.gif')}}" width="18"
                                                                                               height="18"
                                                                                               style="border:1px white solid;"></a>
                            </td>
                            <td style="line-height:12pt; height:10px;"><span class="pagetop"><b class="hnname"><a
                                            href="/">Hacker News</a></b>| <a
                                        href="/comments">comments</a> | <a
                                        href="/jobs">jobs</a> | <a
                                        href="submit.html">submit</a>
                                </span></td>
                            <td style="text-align:right;padding-right:4px;"><span class="pagetop">
                              <a href="logina976.html?goto=news">login</a>
                          </span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr id="pagespace" title="" style="height:10px"></tr>
            <tr>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" class="itemlist">
                        @foreach($stories as $story)
                            <tr class='athing' id='{{$story->itemId}}'>
                                <td align="right" valign="top" class="title"><span class="rank">{{$story->id}}</span>
                                </td>
                                <td valign="top" class="votelinks">
                                    <center><a id='up_28019094'
                                               href='https://news.ycombinator.com/vote?id={{$story->itemId}}&amp;how=up&amp;goto=news'>
                                            <div class='votearrow' title='upvote'></div>
                                        </a></center>
                                </td>
                                <td class="title"><a
                                        href="{{$story->url}}"
                                        class="storylink">{{$story->title}}
                                    </a>
                                    {{--                                <span class="sitebit comhead"> (<a href="from00d6.html?site=locusmag.com"><span--}}
                                    {{--                                            class="sitestr">locusmag.com</span></a>)</span>--}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td class="subtext">
                                    <span class="score" id="score_{{$story->itemId}}">{{$story->score}} points</span> by

                                    <a href="/user?id={{$story->by}}" class="hnuser">{{$story->by}}</a>
                                    <span class="age" title="2021-07-31T15:40:41">
                                        <a href="/comments/?id={{$story->itemId}}">
                                            {{(new App\Http\Helper\TimeHelper)->diffInHours($story->time)}}
                                            {{ (new App\Http\Helper\TimeHelper)->diffInHours($story->time) > 0 ? " hours" : " hour"}} ago
                                        </a>
                                    </span>
                                    <span id="unv_{{$story->itemId}}"></span>

                                    | <a href="item64b1.html?id={{$story->itemId}}">{{count(collect($story->kids))}}
                                        &nbsp;comments</a>
                                </td>
                            </tr>
                        @endforeach


                    </table>
                </td>
            </tr>
            <tr>
                <td><img src="s.gif" height="10" width="0">
                    <table width="100%" cellspacing="0" cellpadding="1">
                        <tr>
                            <td bgcolor="#ff6600"></td>
                        </tr>
                    </table>
                    <br>
                    <center><a href="https://www.ycombinator.com/apply/">
                            Applications are open for YC Winter 2022
                        </a></center>
                    <br>
                    <center><span class="yclinks"><a href="newsguidelines.html">Guidelines</a>
        | <a href="newsfaq.html">FAQ</a>
        | <a href="lists.html">Lists</a>
        | <a href="https://github.com/HackerNews/API">API</a>
        | <a href="security.html">Security</a>
        | <a href="http://www.ycombinator.com/legal/">Legal</a>
        | <a href="http://www.ycombinator.com/apply/">Apply to YC</a>
        | <a href="mailto:hn@ycombinator.com">Contact</a></span><br><br>
                        <form method="get" action="http://hn.algolia.com/">Search:
                            <input type="text" name="q" value="" size="17" autocorrect="off" spellcheck="false"
                                   autocapitalize="off" autocomplete="false"></form>
                    </center>
                </td>
            </tr>
        </table>
    </center>
@endsection
