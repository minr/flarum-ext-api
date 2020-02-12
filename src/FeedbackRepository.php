<?php
namespace Minr\Auth\Qizue;

class FeedbackRepository {

    /**
     * @param int $id
     * @return mixed
     */
    public function findOrFail(int $id) {
        return Feedback::where('id', $id)->firstOrFail();
    }

}
