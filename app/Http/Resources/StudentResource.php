<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'gender' =>   $this->gender,
            'dob' => $this->dob,
            'place_of_birth' => $this->place_of_birth,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'mothers_name' => $this->mothers_name,
            'fathers' => $this->fathers_name,
            'classrooms' => ClassroomResource::collection($this->classrooms)
        ];
    }
}
