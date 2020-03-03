<?php
namespace Minr\Auth\Qizue\Validator;

use Flarum\Foundation\AbstractValidator;

class NameValidator extends AbstractValidator{
    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'name'  => [
            'required',
            'regex:/^[A-Za-z0-9\-_\x{00c0}-\x{00d6}\x{00d8}-\x{00f6}\x{00f8}-\x{00ff}ÁáÀàĂăẮắẰằẴẵẲẳÂâẤấẦầẪẫẨẩǍǎÅåǺǻÄäǞǟÃãȦȧǠǡĄąĀāẢảȀȁȂȃẠạẶặẬậḀḁȺⱥᶏⱯɐⱭɑĀāĒēḠḡĪīŌōŪūȲȳǢǣAÀÁẠÃẢĂẰẮẶẴẲÂẦẤẬẪẨEÈÉẸẼẺÊỀẾỆỄỂIÌÍỊĨỈOÒÓỌÕỎÔỒỐỘỖỔƠỜỚỢỠỞUÙÚỤŨỦƯỪỨỰỮỬYỲÝỴỸỶŸaàáạãảăằắặẵẳâầấậẫẩeèéẹẽẻêềếệễểiìíịĩỉoòóọõỏôồốộỗổơờớợỡởuùúụũủưừứựữửyỳýỵỹỷĐđAaBbCcÇçDdEeFfGgĞğHhIıİiJjKkLMmNnOoÖöPpRrSsŞşTtUuÜüVvYyZzАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪ∅ЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя\x{0e01}-\x{0e3a}\x{0e3f}-\x{0e5a}\x{3041}-\x{3096}\x{30a1}-\x{30fa}\x{4e00}-\x{9fbf}\x{ac00}-\x{d7a3}\x{0C00}-\x{0C7F}\x{0B80}-\x{0BFF}\x{0D00}-\x{0D7F}\x{0C80}-\x{0CFF}\x{7680}-\x{7935}\x{0900}-\x{097F}\x{0600}-\x{06FF}\x{0750}-\x{07FF}\x{FB50}-\x{FDCF}\x{FDF0}-\x{FDFF}\x{FE70}-\x{FEFF}\x{1EE00}-\x{1EEFF}]+$/i',
            'min:3',
            'max:30',
        ],
    ];
}
