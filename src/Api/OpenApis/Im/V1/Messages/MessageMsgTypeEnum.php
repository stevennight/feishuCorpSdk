<?php

namespace Stevennight\FeishuCorpSdk\Api\OpenApis\Im\V1\Messages;

class MessageMsgTypeEnum
{
    /** @var string 消息类型 - 文本 */
    const MSG_TYPE_TEXT = 'text';

    /** @var string 消息类型 - 富文本 */
    const MSG_TYPE_POST = 'post';

    /** @var string 消息类型 - 图片 */
    const MSG_TYPE_IMAGE = 'image';

    /** @var string 消息类型 - 消息卡片 */
    const MSG_TYPE_INTERACTIVE = 'interactive';

    /** @var string 消息类型 - 分享群名片 */
    const MSG_TYPE_SHARE_CHAT = 'share_chat';

    /** @var string 消息类型 - 分享个人名片 */
    const MSG_TYPE_SHARE_USER = 'share_user';

    /** @var string 消息类型 - 语音 */
    const MSG_TYPE_AUDIO = 'audio';

    /** @var string 消息类型 - 视频 */
    const MSG_TYPE_MEDIA = 'media';

    /** @var string 消息类型 - 文件 */
    const MSG_TYPE_FILE = 'file';

    /** @var string 消息类型 - 表情包 */
    const MSG_TYPE_STICKER = 'sticker';
}
