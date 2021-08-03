<?php /** @noinspection PhpUndefinedMethodInspection */


namespace App\Http\Services\Stories;


use App\Exceptions\CannotSaveToModel;
use App\Models\Comment;
use App\Models\Story;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;
use JsonException;

class ItemsActions implements ItemsInterface
{

    /**
     * @throws JsonException
     * @throws CannotSaveToModel
     */
    public function getTopStories(): void
    {
        // TODO: Implement getTopStories() method.
        foreach (json_decode(Http::get('https://hacker-news.firebaseio.com/v0/topstories.json'), true, 512, JSON_THROW_ON_ERROR) as $i) {
            $this->saveStories(json_decode(Http::get("https://hacker-news.firebaseio.com/v0/item/$i.json?print=pretty"), true, 512, JSON_THROW_ON_ERROR));
            print_r(':::saved top story:::');

        }
    }

    /**
     * @throws CannotSaveToModel
     * @throws JsonException
     */
    public function getBestStories():void
    {
        // TODO: Implement getBestStories() method.
        foreach (json_decode(Http::get('https://hacker-news.firebaseio.com/v0/beststories.json'), true, 512, JSON_THROW_ON_ERROR) as $i) {
            $this->saveStories(json_decode(Http::get("https://hacker-news.firebaseio.com/v0/item/$i.json?print=pretty"), true, 512, JSON_THROW_ON_ERROR));
            print_r(':::saved best story:::');

        }

    }

    /**
     * @throws CannotSaveToModel
     * @throws JsonException
     */
    public function getAskStories():void
    {
        // TODO: Implement getBestStories() method.
        foreach (json_decode(Http::get('https://hacker-news.firebaseio.com/v0/askstories.json'), true, 512, JSON_THROW_ON_ERROR) as $i) {
            $this->saveStories(json_decode(Http::get("https://hacker-news.firebaseio.com/v0/item/$i.json?print=pretty"), true, 512, JSON_THROW_ON_ERROR));
            print_r(':::saved ask story:::');

        }
    }

    /**
     * @throws CannotSaveToModel
     * @throws JsonException
     */
    public function getJobStories():void
    {
        // TODO: Implement getBestStories() method.
        foreach (json_decode(Http::get('https://hacker-news.firebaseio.com/v0/jobstories.json'), true, 512, JSON_THROW_ON_ERROR) as $i) {
            $this->saveStories(json_decode(Http::get("https://hacker-news.firebaseio.com/v0/item/$i.json?print=pretty"), true, 512, JSON_THROW_ON_ERROR));
            print_r(':::saved job story:::');

        }
    }

    /**
     * @throws CannotSaveToModel
     * @throws JsonException
     */
    public function getNewStories(): void
    {
            // TODO: Implement getNewStories() method.
            foreach ( (array)json_decode(Http::get('https://hacker-news.firebaseio.com/v0/newstories.json'), true, 512, JSON_THROW_ON_ERROR) as $i) {
                    $this->saveStories(json_decode(Http::get("https://hacker-news.firebaseio.com/v0/item/$i.json?print=pretty"), true, 512, JSON_THROW_ON_ERROR));
                print_r(':::saved new story:::');

            }
    }

    /**
     * @throws CannotSaveToModel
     * @throws JsonException
     */
    public function getShowStories(): void
    {
            // TODO: Implement getNewStories() method.
            foreach ( (array) json_decode(Http::get('https://hacker-news.firebaseio.com/v0/showstories.json'), true, 512, JSON_THROW_ON_ERROR) as $i) {
                    $this->saveStories(json_decode(Http::get("https://hacker-news.firebaseio.com/v0/item/$i.json?print=pretty"), true, 512, JSON_THROW_ON_ERROR));
                print_r(':::saved show story:::');

            }
    }

    /**
     * @throws CannotSaveToModel
     */
    // Section Save Stories
    public function saveStories($itemData): void
    {
        try {
            $existingTopStory = Story::where('itemId', $itemData["id"])->count();
            if (!($existingTopStory > 0)) {
                 $this->modelDataAssignment('CREATE', $itemData);
            } else {
                $this->modelDataAssignment('UPDATE', $itemData);
            }

        } catch (Exception $exception) {

        }
    }

    /**
     * @throws JsonException
     * @throws CannotSaveToModel
     */
    public function comments(){
        $stories = Story::all();
        forEach($stories as $story){
            $comments = collect($story->kids);
            forEach($comments as $comment){
                $comment_info = json_decode(Http::get("https://hacker-news.firebaseio.com/v0/item/$comment.json?print=pretty"), true, 512, JSON_THROW_ON_ERROR);
                $this->saveStories($comment_info);
                print_r(':::saved comment:::');
            }
        }
    }

    // Section Model Data Assignment
    public function modelDataAssignment($model, $itemData): void
    {
        $model === "CREATE"
            ?
                $model = new Story()
            :
                $model = Story::where('itemId', $itemData["id"])->first();

        $model->itemId  = $itemData["id"] ?? "N/A";
        $model->parentId  = $itemData["parent"] ?? 0;
        $model->by  = $itemData["by"] ?? "N/A";
        $model->descendants = $itemData["descendants"] ?? 0;
        $model->kids    = $itemData["kids"] ?? "";
        $model->score   = $itemData["score"] ?? 0;
        $model->time    = Carbon::parse($itemData["time"]);
        $model->type    = $itemData["type"] ?? "N/A";
        $model->url     = $itemData["url"] ?? "N/A";
        $model->title = $itemData["title"] ?? "N/A";
        $model->text = $itemData["text"] ?? "N/A";
        $model->dead = $itemData["dead"] ?? "false";
        $model->deleted = $itemData["deleted"] ?? "false";

        $model->save();
    }


    public function getAllStories()
    {
        // TODO: Implement getAllStories() method.
        return Story::all();
    }

    public function queryStoryById($storyId){
        return Story::where('itemId', $storyId)->first();
    }


}
