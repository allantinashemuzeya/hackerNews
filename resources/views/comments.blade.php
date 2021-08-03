@extends('layouts.app')
@section('content')
<center>
    <table id="hnmain" border="0" cellpadding="0" cellspacing="0" width="85%" bgcolor="#f6f6ef">
        <tr>
            <td bgcolor="#ff6600">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding:2px">
                    <tr>
                        <td style="width:18px;padding-right:4px"><a href="index.html"><img src="{{asset('images/y18.gif')}}" width="18"
                                                                                           height="18" style="border:1px white solid;"></a>
                        </td>
                        <td style="line-height:12pt; height:10px;">
                            <span class="pagetop">
                                <b class="hnname">
                                    <a href="/">Hacker News</a>
                                </b>
                            <span class="topsel">
                                <a href="newcomments.html">comments</a>
                            </span> | <a href="/jobs">jobs</a> | <a href="/">stories</a>
                           </span>

                        </td>
                        <td style="text-align:right;padding-right:4px;"><span class="pagetop">
                              <a href="login8ab4.html?goto=newcomments">login</a>
                          </span></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr id="pagespace" title="New Comments" style="height:10px"></tr>
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" class="itemlist">
                    @foreach($comments as $comment)
                        <tr class='athing' id='28019956'>
                            <td class='ind'></td>
                            <td valign="top" class="votelinks">
                                <center>
                                    <a id='up_28019956' href='https://news.ycombinator.com/vote?id=28019956&amp;how=up&amp;goto=newcomments'>
                                        <div class='votearrow' title='upvote'></div>
                                    </a>
                                </center>
                            </td>
                            <td class="default">
                                <div style="margin-top:2px; margin-bottom:-10px;">
                                <span class="comhead">
                                    <a href="userb937.html?id=davisr" class="hnuser">{{$comment->by}}</a> <span class="age" title="2021-07-31T17:18:02"><a
                                            href="item30b6.html?id=28019956">
                                              {{(new App\Http\Helper\TimeHelper)->diffInHours($comment->time)}}
                                            {{ (new App\Http\Helper\TimeHelper)->diffInHours($comment->time) > 0 ? " hours" : " hour"}} ago

                                        </a></span> <span
                                        id="unv_28019956"></span><span class="par"> | <a
                                            href="item523a.html?id=28017419">parent</a></span> <a class="togg" n="1" href="javascript:void(0)"onclick="return toggle(event, 28019956)">[–]</a>
                                    <span  class='storyon'> | on: <a href="item523a.html?id=28017419">{{ (new App\Http\Services\Stories\ItemsActions)->queryStoryById($comment->parent) !== null ? (new App\Http\Services\Stories\ItemsActions)->queryStoryById($comment->parent)->title : ''}}</a></span>
                                </span>
                                </div>
                                <br>
                                <div class="comment">
                                    <span class="commtext c00">
                                      {!! Str::limit($comment->text, 150, $end='.......') !!}
                                    <div class='reply'></div>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer" style="height:15px"></tr>
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
