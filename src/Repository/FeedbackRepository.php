<?php
namespace Minr\Auth\Qizue\Repository;

class FeedbackRepository {
    /**
     * @param int $id
     * @return mixed
     */
    public function findOrFail(int $id) {
        return Feedback::where('id', $id)->firstOrFail();
    }
}
