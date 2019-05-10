<?php


namespace App\Http\Controllers\Review;


use App\DataProvider\Elasticsearch\ReadReviewDataProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchAction
{
    public function __invoke(Request $request, ReadReviewDataProvider $readReviewDataProvider)
    {
        $map = $readReviewDataProvider->findAllByTag($request->get('tags'));
        return response($map);
    }
}