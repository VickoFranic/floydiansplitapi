<?php

/**
 * @SWG\Post(
 *     path="/contact_us_email",
 *     tags={"general"},
 *     operationId="contactUsEmail",
 *     summary="Send contact us email message",
 *     consumes={"application/json"},
 *     produces={"application/json"},
 *     @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(ref="#/definitions/ContactUsEmailRequest")
 *     ),
 *     @SWG\Response(
 *         response="200",
 *         description="Success"
 *     )
 * )
 */

/**
 *  @SWG\Definition(
 *     definition="ContactUsEmailRequest",
  *     @SWG\Property(
 *         property="from",
 *         type="string",
 *         default="from@mail.dev"
 *     ),
 *     @SWG\Property(
 *         property="message",
 *         type="string",
 *         default="Sample text message"
 *     )
 * )
 */