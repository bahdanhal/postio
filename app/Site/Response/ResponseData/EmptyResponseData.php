<<<<<<< HEAD:app/Site/Response/ResponseData/NotFoundResponseData.php
<?php

declare(strict_types=1);

namespace Postio\Site\Response\ResponseData;

final readonly class NotFoundResponseData extends ResponseData
{
    public function serialize(): array
    {
        return [];
    }
}
=======
<?php

declare(strict_types=1);

namespace Postio\Site\Response\ResponseData;

final readonly class EmptyResponseData extends ResponseData
{
    public function serialize(): array
    {
        return [];
    }
}
>>>>>>> 4e7cb71... release:app/Site/Response/ResponseData/EmptyResponseData.php
